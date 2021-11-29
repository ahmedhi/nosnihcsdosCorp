import mysql.connector
import pandas as pd
mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_input",
  port=3306,
)

mycursor1 = mydb.cursor()


#mycursor.execute("SHOW GLOBAL VARIABLES LIKE 'innodb_rollback_on_timeout';")
liste1=[]

mycursor1.execute("SELECT * FROM `data_input` WHERE 1")
liste1=[]

myresult1 = mycursor1.fetchall()
#mydb.commit()
for x in myresult1:
    liste1.append(x)

df1=pd.DataFrame(liste1,columns=['Nom','Prénom','Telephone','Adresse','Ville','Code postal','Statut','agent','Campagne','Liste d\'appel','Date d\'appel','forme_juridique','nace_code','nace_description','contact_position','numero_entreprise','province','website','sexe','mail_direct','mail_general','gsm','tel_direct','commentaire_appel','First Name','Last Name'])


#-----------------------------------------------------------------
import mysql.connector
import pandas as pd
mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_input",
  port=3306,
)
liste2=[]

mycursor2 = mydb.cursor()

mycursor2.execute("SELECT * FROM `code_postaux` WHERE 1")

myresult2 = mycursor2.fetchall()

for x in myresult2:
    liste2.append(x)

df2=pd.DataFrame(liste2,columns=['PAYS','CONCATENATED','CODE POSTAL','LOCALITE','COMMUNE','CODE POSTAL2','LANGUE Officielle','PROVINCE','REGION','PROVINCE EN','Commune riche'])

#------------------------------------------------------------------------------
import mysql.connector
import pandas as pd
mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod2021",
  database="rod_input",
  port=3306,
)
liste3=[]
mycursor3 = mydb.cursor()
mycursor3.execute("SELECT * FROM `preferred_language` WHERE 1")
myresult3 = mycursor3.fetchall()
mydb.commit()
for x in myresult3:
    liste3.append(x)
df3=pd.DataFrame(liste3,columns=['NomAgent','Prefered Language'])
#-------------------------------------------------------------------------
#pd.merge(df1,df2,on=df1['Code postal'],how=df2['CODE POSTAL2'])
df4=pd.merge(df1,df2,left_on='Code postal',right_on='CODE POSTAL2')
df5=pd.merge(df4,df3,left_on='agent',right_on='NomAgent')
df5['First Name'] = df5['First Name'].str.replace('-',' - ')
df5['Last Name'] = df5['Last Name'].str.replace('-',' - ')
df5['Commune riche'] = df5['Commune riche'].str.replace('',' - ')
selection = df5[['PROVINCE', 'Prénom','numero_entreprise','Adresse','CODE POSTAL','COMMUNE', 'PROVINCE EN','Telephone','mail_direct']]
selection1=selection.rename(columns={"PROVINCE": "Province (BE)", "Prénom": "Account Name","numero_entreprise":"Account Number","Adresse":"Billing Street","CODE POSTAL":"Billing Code","COMMUNE":"Billing City","PROVINCE EN":"Billing Province (BE)","Telephone":"Phone (Account)","mail_direct":"Contact Owner"})
#-----------------------------------------------------------------------------
import pymysql
import pandas as pd




# Connect to the database
connection = pymysql.connect(host='135.148.9.103',
                         user='admin',
                         password='rod2021',
                         db='rod_output',port=3306)


# create cursor
cursor=connection.cursor()

# creating column list for insertion
cols = "`,`".join([str(i) for i in selection1.columns.tolist()])

# Insert DataFrame recrds one by one.
for i,row in selection1.iterrows():
    sql = "INSERT INTO `import_zoho_compte` (`" +cols + "`) VALUES (" + "%s,"*(len(row)-1) + "%s)"
    cursor.execute(sql, tuple(row))

    # the connection is not autocommitted by default, so we must commit to save our changes
    connection.commit()

# Execute query
sql = "SELECT * FROM `import_zoho_compte`"
cursor.execute(sql)

# Fetch all the records
result = cursor.fetchall()
print('traitement pass avec succès ')
connection.close()
