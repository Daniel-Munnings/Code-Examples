operators = ["*", "/", "+", "-"]

print("Please enter your first Number: ")
numberOne = int(input())
print("----------------------------------")

print("Please enter your second Number: ")
numberTwo = int(input())

count = 0
for item in operators:
    print(f"Option {count} for {item}")
    count += 1

opChoice = int(input())

if opChoice == 1:
    calc = numberOne / numberTwo
elif opChoice == 0:
    calc = numberOne * numberTwo
elif opChoice == 2:
    calc = numberOne + numberTwo
elif opChoice == 3:
    calc = numberOne - numberTwo
else:
    calc = "Not a valid Operator"

print(f"Your calculation is: {calc}")