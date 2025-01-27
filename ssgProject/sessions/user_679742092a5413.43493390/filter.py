import json

with open('answerByAI.txt', 'r', encoding='utf-8') as file:
    data = json.load(file)

text_content = data["candidates"][0]["content"]["parts"][0]["text"]

with open('answerByAI1.txt', 'w', encoding='utf-8') as new_file:
    new_file.write(text_content)

