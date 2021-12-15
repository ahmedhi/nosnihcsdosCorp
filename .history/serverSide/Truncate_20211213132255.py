import mysql.connector
import pandas as pd
import pyodbc;
mydb = pyodbc.connect(driver='{SQL Server Native Client 11.0}', host='rods-data-server-01.database.windows.net', database='Data-Rod-Input',
                      trusted_connection='no', user='admin-rods', password='pwd@1')
mycursor1 = mydb.cursor()
mycursor1.execute("TRUNCATE TABLE `data_input_test`")
mydb.commit()
print("Bien")