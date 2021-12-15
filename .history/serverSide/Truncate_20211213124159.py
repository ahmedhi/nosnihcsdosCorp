import mysql.connector
import pandas as pd
import pyodbc;
mydb = pyodbc.connect('Driver={SQL Server};'
                      'rods-data-server-01.database.windows.net;'
                      'Data-Rod-Input;'
                      'UID=admin-rods;'
                      'PWD=roods-pwd@1;'
                      'Trusted_Connection=no;')
mycursor1 = mydb.cursor()
mycursor1.execute("TRUNCATE TABLE `data_input_test`")
mydb.commit()
print("Bien")