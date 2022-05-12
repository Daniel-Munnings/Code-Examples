import functions
# Repeatable blocks

randomStuff = functions.randomDemise()
charRand = randomStuff[1]
taskLRand = randomStuff[2]
taskRand = randomStuff[3]
endGame = False
if taskLRand == 1:
    taskName = "tasksOne"
elif taskLRand == 2:
    taskName = "tasksTwo"
elif taskLRand == 3:
    taskName = "tasksThree"
else:
    taskName = "tasksFour"

print("------------Welcome to The Doctor Who Game-------------")
print("Please choose your Character from the list below:")
functions.taskList("characterList",1)
character = int(input())
functions.gameLogic(character,"characterList",character)

print("\n------------------------------------------------------")
print("Please choose your Start Point from the list below:")
functions.taskList("startPointList",1)
startPoint = int(input())
functions.gameLogic(character,"startPointList",startPoint)

print("\n------------------------------------------------------")
print("Please choose your reaction from the list:")
functions.taskList("tasksOne",1)
option = int(input())
if character == charRand and taskName == "tasksOne" and option == taskRand:
    print("End of Game - Your demise has been thrown upon you")
    endGame = True
else:
    functions.gameLogic(character,"tasksOne",option)

if endGame == False:
    print("\n------------------------------------------------------")
    print("Please choose your reaction from the list:")
    functions.taskList("tasksTwo",1)
    option = int(input())
    if character == charRand and taskName == "tasksTwo" and option == taskRand:
        print("End of Game - Your demise has been thrown upon you")
        endGame = True
    else:
        functions.gameLogic(character,"tasksTwo",option)

if endGame == False:
    print("\n------------------------------------------------------")
    print("Please choose your reaction from the list:")
    functions.taskList("tasksThree",1)
    option = int(input())
    if character == charRand and taskName == "tasksThree" and option == taskRand:
        print("End of Game - Your demise has been thrown upon you")
        endGame = True
    else:
        functions.gameLogic(character,"tasksThree",option)

if endGame == False:
    print("\n------------------------------------------------------")
    print("Please choose your reaction from the list:")
    tasks = functions.taskList("tasksFour",1)
    option = int(input())
    if character == charRand and taskName == "tasksFour" and option == taskRand:
        print("End of Game - Your demise has been thrown upon you")
        endGame = True
    else:
        functions.gameLogic(character,"tasksFour",option)

# End of repeatable blocks
print("Press the 'anykey' to close")
closeApp = input()