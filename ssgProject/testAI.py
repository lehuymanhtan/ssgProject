import requests
import json
import sys
import os

if len(sys.argv) < 2:
    print("Missing parameter")
    sys.exit(1)

userInput = ' '.join(sys.argv[1:])

prompt = "Từ những nguyên liệu tôi gửi sẵn có, hãy tìm cách để tạo ra nhiều món ăn nhất có thể và dễ dàng tìm kiếm cách làm trên youtube, đồng thời đưa ra công thức chi tiết cách làm món đó. Chia kết quả làm 2 trường hợp, trường hợp thứ nhất với đầy đủ các gia vị, trường hợp thứ 2 là không có đủ gia vị, gia vị ở đây là hạt tiêu, muối, mì chính,... Sau đây là các nguyên liệu có sẵn: "
final = prompt + userInput

json_data = {
    "contents": [
        {
            "parts": [
                {"text": final}
            ]
        }
    ]
}

headers = {
    "Content-Type": "application/json"
}

response = requests.post(
    'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=AIzaSyAY8GyI8thdkvwuYMa32ycyVkOPKwtRH4U',
    json=json_data,
    headers=headers
)

print("Current working directory:", os.getcwd())

file_path = os.path.abspath(__file__)

file_path = os.path.join(os.getcwd(), "answerByAI.txt")
print(file_path)

if response.status_code == 200:
    print("a")
    with open(file_path, "w", encoding="utf-8") as f:
        json.dump(response.json(), f, ensure_ascii=False, indent=4)
else:
    print("Error:", response.status_code, response.text)
