teamOne = 8
teamTwo = 8
username = "Geoff"
password = "password123"
correctPassword = "Password1234"

if password == correctPassword:
    print("Correct Password")
elif password != correctPassword:
    print("Incorrect Password")
else:
    print("Enter details again")

if teamOne > teamTwo:
    print("Team One won the Six Nations")
    if teamTwo >= 10:
        print("Team two gets a Bonus point")
    else:
        print("")
elif teamOne < teamTwo:
    print("Team Two won the six Nations")
    if teamTwo >= 10:
        print("Team two gets a Bonus point")
    else:
        print("")
elif teamOne == teamTwo:
    print("No one won")
    if teamTwo >= 10:
        print("Team two gets a Bonus point")
    else:
        print("")
else:
    print("Covid cancelled the Six Nations")