import sys
from youtube_search import YoutubeSearch



if len(sys.argv) > 1:
    find = sys.argv[1]
    results = YoutubeSearch(find, max_results=5).to_dict()
    video_links = [f"https://www.youtube.com{result['url_suffix']}" for result in results]

    for index, link in enumerate(video_links, 1):
        print(f"{index}. {link}")

else:
    print("No parameters received")
