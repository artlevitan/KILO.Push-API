// Go
// https://github.com/artlevitan/KILO.Push-API

package main

import (
	"encoding/json"
	"fmt"
	"io"
	"net/http"
	"strings"
)

const (
	apiURL string = "https://push.kilo.chat/v1/messages/send"
)

func main() {
	data := map[string]string{
		"to":      "USER_TOKEN",         // Recipient: User Token
		"token":   "CHANNEL_TOKEN",      // Sender: Channel Token
		"secret":  "SECRET_KEY",         // Sender: Channel Secret Key
		"message": "Hello world!",       // Your message
		"url":     "https://www.34devs.ru/", // Hyperlink (http:// or https://)
	}

	bytes, err := json.Marshal(data)
	if err != nil {
		fmt.Println(err)
		return
	}
	payload := string(bytes)

	client := &http.Client{}
	req, err := http.NewRequest("POST", apiURL, strings.NewReader(payload))
	if err != nil {
		fmt.Println(err)
		return
	}
	req.Header.Add("Content-Type", "application/json")

	res, err := client.Do(req)
	if err != nil {
		fmt.Println(err)
		return
	}
	defer func(Body io.ReadCloser) {
		err := Body.Close()
		if err != nil {
			fmt.Println(err)
			return
		}
	}(res.Body)

	body, err := io.ReadAll(res.Body)
	if err != nil {
		fmt.Println(err)
		return
	}
	fmt.Println(string(body))
}
