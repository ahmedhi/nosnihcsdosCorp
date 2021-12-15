import mysql.connector
import pandas as pd
import pyodbc;
""" mydb = pyodbc.connect(driver='{SQL Server}', host='rods-data-server-01.database.windows.net', database='Data-Rod-Input',
                      trusted_connection='no', user='admin-rods', password='pwd@1') """
mydb = pyodbc.connect('DRIVER={SQL Server};SERVER=rods-data-server-01.database.windows.net', user='admin-rods',
 password='pwd@1', database='Data-Rod-Input')

mycursor1 = mydb.cursor()
mycursor1.execute("TRUNCATE TABLE `data_input_test`")
mydb.commit()
print("Bien")