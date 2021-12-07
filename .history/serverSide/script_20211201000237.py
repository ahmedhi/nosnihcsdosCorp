import xlsxwriter
import mysql.connector
import numpy as np
import pandas as pd
import xlrd
import os

mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_all",
  port = '3306'
)

mycursor1 = mydb.cursor()
#mycursor1.execute("SELECT * from `data_all2` WHERE 1") rod_all.output_phingoo 
#mycursor1.execute("ALTER TABLE `data_all2` ADD contact_position VARCHAR(255)  AFTER Salutation")
mycursor1.execute("TRUNCATE TABLE rod_all.output_phingoo")
mycursor1.execute("CREATE TABLE `data_all2` AS SELECT * FROM test WHERE 1")
mycursor1.execute("ALTER TABLE `data_all2` ADD contact_position VARCHAR(255)  AFTER Salutation")
mycursor1.execute("ALTER TABLE `data_all2` ADD phone VARCHAR(255)  AFTER contact_position")
mycursor1.execute("ALTER TABLE `data_all2` ADD first_name VARCHAR(255)  AFTER phone")
mycursor1.execute("UPDATE `data_all2` SET `first_name`=CONCAT_WS(`First Name`,' ',`Last Name`)")
mycursor1.execute("UPDATE `data_all2` SET `contact_position`=`Dirigeant 1 Fonction`")
mycursor1.execute("UPDATE `data_all2` SET `phone`=IF(`Phone Account` IS NULL ,Mobile ,`Phone Account`)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Account Name`   `last_name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Account Number`   `numero_entreprise` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Billing Code`   `code_postal` VARCHAR(255)")

mycursor1.execute("ALTER TABLE `data_all2` change column `Billing City`   `commune` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Billing Province`   `province` VARCHAR(255)") 
mycursor1.execute("ALTER TABLE `data_all2` change column `Billing Street`   `rue` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Code d'activité`   `nace_code` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Site Internet`   `website` VARCHAR(255)")

mycursor1.execute("ALTER TABLE `data_all2` ADD `telephone supplémentaire` VARCHAR(255)  AFTER phone")
mycursor1.execute("UPDATE `data_all2` SET `first_name`= REPLACE(`first_name`, '-', '')")
mycursor1.execute("ALTER TABLE `data_all2` change column `phone`   `telephone` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `data_all2` change column `Description`   `nace_description` VARCHAR(255)")
mycursor1.execute("INSERT INTO rod_all.output_phingoo(`last_name`, `Forme juridique`, `nace_code`, `nace_description`, `first_name`, `numero_entreprise`, `contact_position`, `rue`, `code_postal`, `commune`, `province`, `website`, `telephone`, `telephone supplémentaire`, `Preferred Language`, `Nom Fichier`, `Date du Ficher`, `Lien Vers le Fichier`) SELECT`last_name`, `Forme juridique`, `nace_code`, `nace_description`, `first_name`, `numero_entreprise`, `contact_position`, `rue`, `code_postal`, `commune`, `province`, `website`, `telephone`, `telephone supplémentaire`, `Preferred Language`, `Nom Fichier`, `Date du Ficher`, `Lien Vers le Fichier` FROM `data_all2` WHERE 1")
mycursor1.execute("DROP TABLE rod_all.data_all2")
mydb.commit()
print("Bien");