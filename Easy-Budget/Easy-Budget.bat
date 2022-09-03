START C:\wamp64\wampmanager.exe
ping 192.0.2.2 -n 1 -w 10000 > nul
set url="http://localhost/Easy-budget/Expense_Manager/"
start Opera %url%