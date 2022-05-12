file = open("Original.txt", "r")
blockedWords = ["Amazon", "legal", "app", "@zsk"]
foundWords = []

for line in file:
    if line.startswith("\n") != True:
        lineText = line.strip("\n")
        for word in blockedWords:
            if word in lineText:
                print(f"{word} found in line '{lineText}'")
                foundWords.append(word)
print(foundWords)

results = open("file.txt", "a")
results.write(f"\n---------------------------------------------------\n")
for word in blockedWords:
    counter = 0
    for foundWord in foundWords:
        if word == foundWord:
            counter = counter+1
    print(f"{word} found {counter} times")
    results.write(f"{word} found {counter} times\n")
results.close()
