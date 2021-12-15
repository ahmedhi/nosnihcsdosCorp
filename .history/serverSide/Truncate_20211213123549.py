import mysql.connector
import pandas as pd
mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_input",
)

mycursor1 = mydb.cursor()
mycursor1.execute("TRUNCATE TABLE `data_input_test`")
mydb.commit()
print("Bien")