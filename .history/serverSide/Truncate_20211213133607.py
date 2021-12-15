import mysql.connector
import pandas as pd
import pyodbc;
mydb = pyodbc.connect(driver='{SQL Server}', host='rods-data-server-01.database.windows.net', database='Data-Rod-Input', user='admin-rods', password='pwd@1')

mycursor1 = mydb.cursor()
mycursor1.execute("TRUNCATE TABLE `data_input_test`")
mydb.commit()
print("Bien")