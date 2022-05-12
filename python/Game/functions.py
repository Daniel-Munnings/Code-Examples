import random

def randomDemise():
    characterRandom = random.randint(1,5)
    taskListRandom = random.randint(1,4)
    taskRandom = random.randint(1,4)
    randDict = {
        1:characterRandom,
        2:taskListRandom,
        3:taskRandom
    }
    return randDict

def taskList(taskName,taskFunction):
    match taskName:
        # Start of repeatable blocks
        case "characterList":
            characterList = {
                1:"The Doctor",
                2:"K9",
                3:"River",
                4:"The Master",
                5:"Dalek"
            }
            if taskFunction == 1:
                generalLoop(characterList)
            else:
                return characterList
        case "startPointList":
            startPointList = {
                1:"TARDIS",
                2:"Galifrey",
                3:"Skaro",
                4:"Earth",
                5:"Wales"
            }
            if taskFunction == 1:
                generalLoop(startPointList)
            else:
                return startPointList
        case "tasksOne":
            tasksOne = {
                1:"Leave the TARDIS and lock the door",
                2:"Leave the TARDIS and it fades away",
                3:"You sense the Doctor is near you",
                4:"The TARDIS appears in front of you..."
            }
            if taskFunction == 1:
                generalLoop(tasksOne)
            else:
                return tasksOne
        case "tasksTwo":
            tasksTwo = {
                1:"Walk into town and look for Donna",
                2:"Take out your Sonic Screwdriver and scan for disturbances",
                3:"Prepare for confrontation",
                4:"You smile and try the door to the TARDIS"
            }
            if taskFunction == 1:
                generalLoop(tasksTwo)
            else:
                return tasksTwo
        case "tasksThree":
            tasksThree = {
                1:"Yes",
                2:"No",
                3:"Maybe",
                4:"In your dreams"
            }
            if taskFunction == 1:
                generalLoop(tasksThree)
            else:
                return tasksThree
        case "tasksFour":
            tasksFour = {
                1:"Red",
                2:"Yellow",
                3:"Pink",
                4:"Orange"
            }
            if taskFunction == 1:
                generalLoop(tasksFour)
            else:
                return tasksFour
        # End of repeatable blocks

def generalLoop(dictionary,*args):
    for key, value in dictionary.items():
        print(key, "for", value)

def gameLogic(character,stage,option):
    if character < 4:
        tasks = taskList(stage,2)
        print(tasks[option])
    elif character < 6:
        tasks = taskList(stage,2)
        print(tasks[option])
    else:
        print("You are not recognised!!!")
        