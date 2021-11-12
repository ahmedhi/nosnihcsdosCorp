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


#options = Options()
#options.add_argument("--headless") # Runs Chrome in headless mode.
#options.add_argument('--no-sandbox') # Bypass OS security model
#options.add_argument('--disable-gpu')  # applicable to windows os only
#options.add_argument('start-maximized') # 
#options.add_argument('disable-infobars')
#options.add_argument("--enable-extensions")
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
#driver.get("http://google.com/")
#url="https://www.zerobounce.net/members/login/"
#driver = webdriver.Chrome(r"C:\Users\infodos\.wdm\drivers\chromedriver\win32\93.0.4577.63\chromedriver.exe")
#driver.get(url)
#url="https://www.zerobounce.net/members/login/"
#ChromeDriverManager().install()
#r"C:\\Users\\infodos\.wdm\drivers\\chromedriver\\win32\\93.0.4577.63\\chromedriver.exe"
#driver = webdriver.Chrome(ChromeDriverManager().install())
#driver.get(url)
username="tom.kalsan@rodschinson.com"
password="YuR9YrKB"
url="https://www.zerobounce.net/members/login/"
driver.get(url)
driver.find_element_by_name("fe_UserName").send_keys(username)
driver.find_element_by_name("fe_Password").send_keys(password)
driver.find_element_by_css_selector("input[type=\"submit\" i]").click()