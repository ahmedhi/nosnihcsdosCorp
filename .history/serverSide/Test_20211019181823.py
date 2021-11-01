import xlsxwriter
import mysql.connector


def fetch_table_data(table_name):
    cnx = mysql.connector.connect(
        host='135.148.9.103',
        database='rod_output',
        user='admin',
        password='rod2021'
    )

    cursor = cnx.cursor()
    cursor.execute('select * from ' + table_name)

    header = [row[0] for row in cursor.description]

    rows = cursor.fetchall()

    # Closing connection
    cnx.close()

    return header, rows

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

export('import_zoho_compte')
export('import_zoho_all')
export('import_zoho_contact')

#!/usr/bin/python
import smtplib,ssl
from email.mime.multipart import MIMEMultipart
from email.mime.base import MIMEBase
from email.mime.text import MIMEText
from email.utils import formatdate
from email import encoders

def send_mail(send_from,send_to,subject,text,files,server,port,username='',password='',isTls=True):
    msg = MIMEMultipart()
    msg['From'] = send_from
    msg['To'] = send_to
    msg['Date'] = formatdate(localtime = True)
    msg['Subject'] = subject
    msg.attach(MIMEText(text))
    for f in files:
        part = MIMEBase('application', "octet-stream")
        part.set_payload(open(f, "rb").read())
        encoders.encode_base64(part)
        part.add_header('Content-Disposition', 'attachment; filename='+f)
        msg.attach(part)
      

    #context = ssl.SSLContext(ssl.PROTOCOL_SSLv3)
    #SSL connection only working on Python 3+
    smtp = smtplib.SMTP(server, port)
    if isTls:
        smtp.starttls()
    smtp.login(username,password)
    smtp.sendmail(send_from, send_to, msg.as_string())
    smtp.quit


files=['import_zoho_all.xlsx','import_zoho_compte.xlsx','import_zoho_contact.xlsx']
send_from = 'chanchaf.pub@gmail.com'
sender_pass = '28/08/1993'
#send_to = 'tony.kyrie@gmail.com '
subject='fichier Import Zoho'
text = '''Bonjour,
Ci-joint fichier Import Zoho All,compte et contact .

Cordialement
'''
server='smtp.gmail.com'
port=587

li =['abdelali.sms@gmail.com','tony.kyrie@gmail.com']
length = len(li)
for i in range(length): 
    send_to = li[i]
    send_mail(send_from,send_to,subject,text,files,server,port,username='chanchaf.pub@gmail.com',password='28/08/1993',isTls=True)
  
import os
os.remove("import_zoho_all.xlsx")
os.remove("import_zoho_compte.xlsx")
os.remove("import_zoho_contact.xlsx")