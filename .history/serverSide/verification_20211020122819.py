import xlsxwriter
import mysql.connector
#from selenium.webdriver.chrome.options import Options 
from selenium import webdriver
import time
from bs4 import BeautifulSoup
import numpy as np
import pandas as pd
import xlrd
from selenium import webdriver
import requests, time
import re

def fetch_table_data(table_name):
    cnx = mysql.connector.connect(
        host='135.148.9.103',
        database='rod_input',
        user='admin',
        password='rod2021'
    )

    cursor = cnx.cursor()
    cursor.execute('select mail_direct from ' + table_name)

    header = [row[0] for row in cursor.description]

    rows = cursor.fetchall()

    # Closing connection
    cnx.close()

    return header, rows

#----------------------------------------------------------------------

def export(table_name):
    # Create an new Excel file and add a worksheet.
    workbook = xlsxwriter.Workbook(table_name + '.xlsx')
    worksheet = workbook.add_worksheet('MENU')

    # Create style for cells
    header_cell_format = workbook.add_format({'bold': True, 'border': True, 'bg_color': 'yellow'})
    body_cell_format = workbook.add_format({'border': True})

    header, rows = fetch_table_data(table_name)

    row_index = 0
    column_index = 0

    for column_name in header:
        worksheet.write(row_index, column_index, column_name, header_cell_format)
        column_index += 1

    row_index += 1
    for row in rows:
        column_index = 0
        for column in row:
            worksheet.write(row_index, column_index, column, body_cell_format)
            column_index += 1
        row_index += 1

    print(str(row_index) + ' rows written successfully to ' + workbook.filename)

    # Closing workbook
    workbook.close()

#----------------------------------------------------------------------
export('init_data')
excel_file_path = 'init_data.xlsx'
#df = pd.read_excel(excel_file_path, None)
#if 'Sheet1' in df.keys():
data= pd.read_excel("init_data.xlsx", sheet_name='MENU')

#----------------------------------------------------------------------

#username="tom.kalsan@rodschinson.com"
#password="YuR9YrKB"
#liste='C:\\Users\\infodos\\3D Objects\\Web Scraping\\EmailTest2.xlsx'
#liste=['y.bassam@rodschinson.com','abdelali.sms@gmail.com','tony.kyrie@g'] 
#liste1=[]
#options = Options()
#options.add_argument("--headless") # Runs Chrome in headless mode.
#options.add_argument('--no-sandbox') # Bypass OS security model
#options.add_argument('--disable-gpu')  # applicable to windows os only
#options.add_argument('start-maximized') # 
#options.add_argument('disable-infobars')
#options.add_argument("--enable-extensions")
#driver = webdriver.Chrome(chrome_options=options, executable_path=r"C:\Users\infodos\.wdm\drivers\chromedriver\win32\93.0.4577.63\chromedriver.exe")
#driver.get("http://google.com/")
#url="https://www.zerobounce.net/members/login/"
#driver = webdriver.Chrome(r"C:\Users\infodos\.wdm\drivers\chromedriver\win32\93.0.4577.63\chromedriver.exe")
#driver.get(url)
#url="https://www.zerobounce.net/members/login/"
driver = webdriver.Chrome(r"C:\\Users\\infodos\.wdm\drivers\\chromedriver\\win32\\93.0.4577.63\\chromedriver.exe")
#driver.get(url)
data=data.dropna()
liste1=[]
for row in data['mail_direct']:
    username="tom.kalsan@rodschinson.com"
    password="YuR9YrKB"
    url="https://www.zerobounce.net/members/login/"
    driver.get(url)
    driver.find_element_by_name("fe_UserName").send_keys(username)
    driver.find_element_by_name("fe_Password").send_keys(password)
    driver.find_element_by_css_selector("input[type=\"submit\" i]").click()
    driver.get("https://www.zerobounce.net/members/singleemailvalidator/")
    driver.find_element_by_name("ctl00$MainContent$fe_email_address").send_keys(row)
    time.sleep(2)
    driver.find_element_by_name("ctl00$MainContent$btnValidate").click()
    a=driver.find_element_by_class_name("item-status").text
    b=driver.find_element_by_id("MainContent_apiResults1").text 
    liste1.append([row,b])
    time.sleep(2)

df=pd.DataFrame(liste1,columns=['Email','Status'])

import os
os.remove("init_data.xlsx")
writer = pd.ExcelWriter('Verification_Email.xlsx')
df.to_excel(writer, 'data')
writer.save()