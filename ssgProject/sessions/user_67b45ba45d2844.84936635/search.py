from youtube_search import YoutubeSearch

with open("foodOnYoutube.txt", "r", encoding="utf-8") as file:
    food_list = [line.strip() for line in file.readlines() if line.strip()] 

with open("foodVidLink.txt", "w", encoding="utf-8") as output_file:
    for food in food_list:
        print(f"\n🔎 Searching for: {food}...")

        results = YoutubeSearch(food, max_results=5).to_dict() 

        video_links = [f"https://www.youtube.com{result['url_suffix']}" for result in results]


        output_file.write(f"🔹 {food}:\n")
        for index, link in enumerate(video_links, 1):
            output_file.write(f"{index}. {link}\n")
        output_file.write("\n")


