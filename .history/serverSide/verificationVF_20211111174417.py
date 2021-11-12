import xlsxwriter
import mysql.connector
from selenium.webdriver.chrome.options import Options 
from selenium import webdriver
import time
from bs4 import BeautifulSoup
import numpy as np
import pandas as pd
import xlrd
from selenium import webdriver
import requests, time
import re
import os
from webdriver_manager.chrome import ChromeDriverManager
from selenium import webdriver
import os

mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_input",
  port = '3306'
)

mycursor1 = mydb.cursor()

mycursor1.execute("SELECT mail_direct from `data_input` WHERE 1")
liste1=[]

myresult1 = mycursor1.fetchall()
#mydb.commit()
for x in myresult1:
    liste1.append(x)
data=pd.DataFrame(liste1,columns=['mail_direct'])

import warnings

warnings.filterwarnings("ignore")

options = Options()
options.add_argument("--headless") # Runs Chrome in headless mode.
options.add_argument('--no-sandbox') # Bypass OS security model
options.add_argument('--disable-gpu')  # applicable to windows os only
options.add_argument('start-maximized') #
options.add_argument('disable-infobars')
options.add_argument("--enable-extensions")
driver = webdriver.Chrome(executable_path="/usr/lib/chromium-browser/chromedriver",chrome_options=options)

data.replace('', np.nan, inplace=True)
data=data.dropna(how='any',axis=0)
liste1=[]
    
username="tom.kalsan@rodschinson.com"
password="YuR9YrKB"
url="https://www.zerobounce.net/members/login/"
driver.get(url)
driver.find_element_by_name("fe_UserName").send_keys(username)
driver.find_element_by_name("fe_Password").send_keys(password)
driver.find_element_by_css_selector("input[type=\"submit\" i]").click()
for row in data['mail_direct']:
    try:
        driver.get("https://www.zerobounce.net/members/singleemailvalidator/")
        driver.find_element_by_name("ctl00$MainContent$fe_email_address").send_keys(row)
        driver.find_element_by_name("ctl00$MainContent$btnValidate").click()
        a=driver.find_element_by_class_name("item-status").text
        b=driver.find_element_by_id("MainContent_apiResults1").text 
        liste1.append([row,b])
        time.sleep(3)
    except:
        pass

df=pd.DataFrame(liste1,columns=['Email','Status'])

import os
#os.remove("data_input.xlsx")
#os.remove("Verification.xlsx")
writer = pd.ExcelWriter("/var/www/html/nosnihcsdosCorp/serverSide/Verification.xlsx")
df.to_excel(writer, 'data')
writer.save()
print('verification est bonne')