from colorama import Fore, Back, Style
print(Style.RESET_ALL)

answer = open("model_answer.txt", "r")
phrases = open("phrases.txt", "r")

answerArray = []
phrasesArray = []

for line in answer:
    answerArray.append(line)

for phrase in phrases:
    phrasesArray.append(phrase)

for line in answerArray:
    for phrase in phrasesArray:
        text = phrase.strip("\n")
        if text in line:
            print(f"{Fore.GREEN + 'Success' + Style.RESET_ALL}")
        else:
            print(f"{Back.RED + Fore.WHITE + 'Unsuccessful' + Style.RESET_ALL}")