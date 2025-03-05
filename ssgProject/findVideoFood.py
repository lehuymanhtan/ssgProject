from youtube_search import YoutubeSearch


find = input("enter something that you wanna search: ")

results = YoutubeSearch(find, max_results=10).to_dict()


video_links = [f"https://www.youtube.com{result['url_suffix']}" for result in results]

for index, link in enumerate(video_links, 1):
    print(f"{index}. {link}")
