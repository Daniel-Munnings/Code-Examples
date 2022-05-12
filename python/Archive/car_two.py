cars = ["Volvo", "Ford", "Renault", "Skoda"]
colours = ["Red", "Blue", "Green", "Silver"]
availableCars = ""

print("---------------------------------------------------------------------------------------------------------")
print(" ")
print("What is your name?")
name = input().capitalize()
print("Hello,",name,"what is your Age?")
age = int(input())
print("Thank you we will just check those details")
if age >= 17:
    print("Your details have come back fine. What brand of car are you looking for?")
    instock = False
    while instock == False:
        carChoice = input()
        for car in cars:
            if car == carChoice or car.lower() == carChoice.lower() or car.upper() == carChoice.upper():
                instock = True
                break
            else:
                instock = False
        if instock == False:
            print("Sorry, we don't have",carChoice,"in stock. Please see what we do have below:")
            availableCars = ", ".join(cars)
            print(availableCars)
            print("Please choose again...")

    print("What colour of car are you looking for?")
    instock = False
    while instock == False:
        colourChoice = input()
        for colour in colours:
            if colour == colourChoice:
                instock = True
                break
            else:
                instock = False
        if instock == False:
            print("Sorry, we don't have",colourChoice,"in stock. Please see what we do have below:")
            availableColours = ", ".join(colours)
            print(availableColours)
            print("Please choose again...")

    print("Congratulations we have that in stock!")
    print("---------------------------------------")
    print("You have just ordered a",carChoice,"in",colourChoice)
    print("---------------------------------------")
    close = input()
else:
    ageDifference = 17-age
    print("We are sorry, but you are too young to drive. We look forward to seeing you in",ageDifference,"years")
    close = input()