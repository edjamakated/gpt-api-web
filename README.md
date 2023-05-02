# GPT-PHP-Response

This repository contains a PHP script that uses OpenAI's API to generate GPT-4 based responses based on user instructions. The script also saves the input and generated responses to a SQLite3 database.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [License](#license)

## Installation

1. Clone the repository

2. Replace 'sk-yourKeyHere' with your OpenAI API key in the DEFAULT_API_KEY constant in api.php

3. Install PHP and SQLite3 if not already installed.

4. Make sure the gpt_responses.db file has the correct permissions to allow the PHP script to read and write.

## Usage

This script is intended to be run as an API, receiving POST requests containing JSON data.

To call the API, send a POST request to the script's URL with the following JSON data structure:

```
{
  "user_instructions": "Your user instructions",
  "assistant_instructions": "Your assistant instructions",
  "system_instructions": "Your system instructions"
}
```

Example POST request using cURL
```
curl -X POST -H "Content-Type: application/json" -d '{"user_instructions": "Write a poem about the moon.", "assistant_instructions": "Write a beautiful poem about the moon.", "system_instructions": "You are a GPT that writes amazing poems. Write a poem about the moon."}' https://yourserver.com/path/to/api.php
```

The script returns a JSON object with the generated response
```
{
  "response": "The generated response"
}
```

## License

Please credit this github repository if you re-use the code

## Contributions

Looking for contributors to improve and expand this into a universal blackbox for openAI api web applications
