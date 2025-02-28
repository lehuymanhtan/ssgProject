import json
import re

with open('answerByAI.txt', 'r', encoding='utf-8') as file:
    data = json.load(file)

text_content = data["candidates"][0]["content"]["parts"][0]["text"]

with open('answerByAI1.txt', 'w', encoding='utf-8') as new_file:
    new_file.write(text_content)

with open("answerByAI1.txt", "r", encoding="utf-8") as file:
    text = file.read().strip()

pattern = r"\%([a-zA-Z0-9\sàáạảãâầấậẩẫbcdéèẻẽêềếệểễghiíìỉĩîìịỉĩjklmnóòỏõôồốộổỗơờớởỡơpqrstúùủũưừứựửữvxyz]+)\%"

matches = re.findall(pattern, text)

with open("foodOnYoutube.txt", "w", encoding="utf-8") as output_file:
    for dish in matches:
        output_file.write(dish + "\n")