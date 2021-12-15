import mysql.connector
import pandas as pd
import pyodbc;
""" mydb = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_input",
) """
mydb = pyodbc.connect('Driver={SQL Server};'
                      'rods-data-server-01.database.windows.net;'
                      'Data-Rod-Input;'
                      'UID=admin-rods;'
                      'PWD=roods-pwd@1;'
                      'Trusted_Connection=no;')

""" mydb1 = mysql.connector.connect(
  host="135.148.9.103",
  user="admin",
  password="rod@2021",
  database="rod_output",
) """
mydb1 = pyodbc.connect('Driver={SQL Server};'
                      'rods-data-server-01.database.windows.net;'
                      'Data-Rod-Input;'
                      'UID=admin-rods;'
                      'PWD=roods-pwd@1;'
                      'Trusted_Connection=no;')

mycursor1 = mydb.cursor()
mycursor2 = mydb1.cursor()
mycursor2.execute("TRUNCATE TABLE Import_Zoho_all")
mycursor2.execute("TRUNCATE TABLE Import_Zoho_contact")
mycursor2.execute("TRUNCATE TABLE Import_Zoho_compte")
mycursor1.execute("DROP TABLE IF EXISTS input1")
mycursor1.execute("DROP TABLE IF EXISTS input2")
mycursor1.execute("DROP TABLE IF EXISTS input3")
mycursor1.execute("CREATE TABLE input1 AS SELECT * FROM data_input LEFT JOIN `code_postaux` ON `data_input`.`code_postal`= `code_postaux`.`CODE POSTAL2` WHERE 1")
mycursor1.execute("UPDATE `input1` SET `sexe`=IF(`sexe`<>'NULL',`sexe`,'M')")
mycursor1.execute("UPDATE `input1` SET `sexe`=IF(`sexe`='','M',`sexe`)")
mycursor1.execute("UPDATE `input1` SET `sexe`=IF(`sexe` IS NULL,'M',`sexe`)")
mycursor1.execute("ALTER TABLE `input1` change column adresse  `Billing Street` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1` change column `code_postal`  `Billing Code` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1` change column PAYS  `Pays` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1` change column COMMUNE  `Billing City` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1` change column REGION  `Région` VARCHAR(255)")
mycursor1.execute("UPDATE `input1` SET `Billing City`= REPLACE(`Billing City`, '-', ' - ')")
mycursor1.execute("UPDATE `input1` SET `Billing City`= REPLACE(`Billing City`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1` SET `Billing City`= REPLACE(`Billing City`, '?', 'e')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '-', ' ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', '  ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, 'x000D', ' ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, 'x000d', ' ')")
mycursor1.execute("UPDATE `input1` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '?', 'e')")

mycursor1.execute("UPDATE `input1` SET `Billing Street`= REPLACE(`Billing Street`, '?', 'e')")
mycursor1.execute("UPDATE `input1` SET `nace_description`= REPLACE(`nace_description`, '-', ' ')")
mycursor1.execute("UPDATE `input1` SET `nace_description`= REPLACE(`nace_description`, '?', 'e')")
mycursor1.execute("ALTER TABLE `input1` ADD Salutation VARCHAR(255)  AFTER nom")
mycursor1.execute("ALTER TABLE `input1` ADD `Salutation Emails`  VARCHAR(255)  AFTER Salutation")
#mycursor1.execute("UPDATE `input1` SET sexe=IF(sexe="" or sexe IS NULL,'M',sexe)")
mycursor1.execute("CREATE TABLE input2 AS SELECT * FROM `input1` LEFT JOIN `languageagent` ON `input1`.`agent`= `languageagent`.`NomAgent`  WHERE 1")
#mycursor1.execute("UPDATE `input2` SET `Prefered Language`= Preferred Language'")
mycursor1.execute("ALTER TABLE `input2` change column ` Prefered Language`  `Preferred Language` VARCHAR(255)")
mycursor1.execute("UPDATE `input2` SET `Preferred Language`= REPLACE(`Preferred Language`, ' ', '')")
mycursor1.execute("UPDATE `input2` SET Salutation=IF(`sexe`='M' && `Preferred Language`='NL','heer',IF(`sexe`='F' && `Preferred Language`='NL','mevrouw',IF(`sexe`='M' && `Preferred Language`='FR','Monsieur',IF(`sexe`='F' && `Preferred Language`='FR','Madame',Salutation))))")
mycursor1.execute("UPDATE `input2` SET `Salutation Emails`=IF(`sexe`='M' && `Preferred Language`='NL','Geachte',IF(`sexe`='F' && `Preferred Language`='NL','Geachte',IF(`sexe`='M' && `Preferred Language`='FR','Cher',IF(`sexe`='F' && `Preferred Language`='FR','Chère',`Salutation Emails`))))")
mycursor1.execute("CREATE TABLE `input3` AS SELECT * FROM `input2` WHERE statut='OPPORTUNITES' or statut='ACHETEUR' or statut='ACHETEUR / VENDEUR' OR statut='VENDEUR' OR statut='VENDEUR FUTUR' OR statut='RDV'")
mycursor1.execute("ALTER TABLE `input3` ADD Acheteur VARCHAR(255)  AFTER statut")
mycursor1.execute("ALTER TABLE `input3` ADD Vendeur VARCHAR(255)  AFTER Acheteur")
mycursor1.execute("UPDATE `input3` SET Acheteur=IF(statut='ACHETEUR' or statut='ACHETEUR / VENDEUR','True','False')")
mycursor1.execute("UPDATE `input3` SET Vendeur=IF(statut='VENDEUR' or statut='VENDEUR FUTUR'  or statut='ACHETEUR / VENDEUR' ,'True','False')")
mycursor1.execute("ALTER TABLE `input3` ADD `Origine du Prospect` VARCHAR(255)  AFTER Vendeur")
mycursor1.execute("ALTER TABLE `input3` ADD `Other Street` VARCHAR(255)  AFTER `Origine du Prospect`")
mycursor1.execute("ALTER TABLE `input3` ADD `Other Zip` VARCHAR(255)  AFTER `Other Street` ")
mycursor1.execute("ALTER TABLE `input3` ADD `Other City` VARCHAR(255)  AFTER `Other Zip`")
mycursor1.execute("ALTER TABLE `input3` ADD `Converting Agent` VARCHAR(255)  AFTER `Other City`")
mycursor1.execute("ALTER TABLE `input3` ADD `Phone (Account)` VARCHAR(255)  AFTER `Converting Agent`")
mycursor1.execute("UPDATE `input3` SET `Origine du Prospect`='Prospection phone call'")
mycursor1.execute("UPDATE `input3` SET `tel_direct`=IF(LEFT(`tel_direct`,2)='32' or LEFT(`tel_direct`,1)='+' or `tel_direct` IS NULL,`tel_direct`,CONCAT('32',`tel_direct`))")
mycursor1.execute("UPDATE `input3` SET telephone=IF(LEFT(`telephone`,2)='32' or LEFT(`telephone`,1)='+' or  `telephone` IS NULL,`telephone`,CONCAT('32',`telephone`))")
#mycursor1.execute("UPDATE `input3` SET `gsm`=IF(LEFT(`gsm`,2)<>'32' or LEFT(`gsm`,1)<>'+' and `gsm` IS NOT NULL,CONCAT('32',`gsm`),`gsm`)")
mycursor1.execute("UPDATE `input3` SET `gsm`=IF(LEFT(`gsm`,2)='32' or LEFT(`gsm`,1)='+' or `gsm` IS NULL,`gsm`,CONCAT('32',`gsm`))")

mycursor1.execute("UPDATE `input3` SET `gsm`=IF(LENGTH(`gsm`)<4,NULL,`gsm`)")
mycursor1.execute("UPDATE `input3` SET `tel_direct`=IF(LENGTH(`tel_direct`)<4,NULL,`tel_direct`)")
#mycursor1.execute("UPDATE `input3` SET `Phone (Account)`=Phone ")
mycursor1.execute("ALTER TABLE `input3` ADD `Mobile` VARCHAR(255)  AFTER `Phone (Account)`")
mycursor1.execute("ALTER TABLE `input3` ADD `Phone` VARCHAR(255)  AFTER `Mobile`")
mycursor1.execute("UPDATE `input3` SET `Mobile`=IF(`gsm` IS NOT NULL and LEFT(`gsm`,1)<>'+',CONCAT('+',`gsm`),`gsm`)")
mycursor1.execute("UPDATE `input3` SET `Phone`=IF(LEFT(`tel_direct`,2)='32' And `tel_direct` IS NOT NULL,CONCAT('+',`tel_direct`) ,IF(LEFT(telephone,2)='32',CONCAT('+',telephone),telephone))")
mycursor1.execute("UPDATE `input3` SET `Other Street`=`Billing Street`")
mycursor1.execute("UPDATE `input3` SET `Phone (Account)`=Phone ")
mycursor1.execute("UPDATE `input3` SET `Other Zip`=`Billing Code`")
mycursor1.execute("UPDATE `input3` SET `Other City`=`Billing City`")
mycursor1.execute("UPDATE `input3` SET `Converting agent`=IF(Vendeur='True',agent,NULL)")
mycursor1.execute("ALTER TABLE `input3` ADD `Province (BE)` VARCHAR(255)  AFTER `Phone (Account)`")
mycursor1.execute("UPDATE `input3` SET `Province (BE)`=`province`")
mycursor1.execute("ALTER TABLE `input3` ADD `Vendor Assessment Notes` VARCHAR(655)  AFTER `Phone (Account)`")
mycursor1.execute("UPDATE `input3` SET `Vendor Assessment Notes`=IF(Vendeur='True',`commentaire_appel`,NULL)")
mycursor1.execute("ALTER TABLE `input3` ADD `New Import` VARCHAR(655)  AFTER `Vendor Assessment Notes`")
mycursor1.execute("UPDATE `input3` SET `New Import`='400'")
mycursor1.execute("UPDATE `input3` SET `Other Street`=IF(statut='RDV' or statut='VENDEUR',`Billing Street`,NULL)")
mycursor1.execute("UPDATE `input3` SET `Other Zip`=IF(statut='RDV' or statut='VENDEUR',`Billing Code`,NULL)")
mycursor1.execute("UPDATE `input3` SET `Other City`=IF(statut='RDV' or statut='VENDEUR',`Billing City`,NULL)")
mycursor1.execute("ALTER TABLE `input3` ADD `Source list name` VARCHAR(655)  AFTER `New Import`")
mycursor1.execute("UPDATE `input3` SET `Source list name`=CONCAT(`liste_appel`,' ',`date_appel`)")
mycursor1.execute("UPDATE `input3` SET `Preferred Language`=IF(`Preferred Language`='FR','French',IF(`Preferred Language`='NL','Dutch',`Preferred Language`))")
mycursor1.execute("ALTER TABLE `input3` ADD `Contact Owner` VARCHAR(655)  AFTER `Source list name`")
mycursor1.execute("UPDATE `input3` SET `Contact Owner`=IF(statut='ACHETEUR' or statut='OPPORTUNITES' AND `Preferred Language`='Dutch','h.malchasian@rodschinson.com',IF(statut='VENDEUR' or statut='ACHETEUR / VENDEUR' or statut='VENDEUR FUTUR' and `Preferred Language`='Dutch','wim.hoste@rodschinson.com',IF(statut='ACHETEUR' or statut='OPPORTUNITES' and  `Preferred Language`='French','m.bariaz@rodschinson.com',IF(statut='VENDEUR' or statut='ACHETEUR / VENDEUR' or statut='VENDEUR FUTUR' and `Preferred Language`='French','m.bariaz@rodschinson.com',NULL))))")
mycursor1.execute("ALTER TABLE `input3` ADD `Business Finder Name` VARCHAR(655)  AFTER `Contact Owner`")
mycursor1.execute("UPDATE `input3` SET `Business Finder Name`=Agent")
mycursor1.execute("ALTER TABLE `input3` ADD `Home Phone` VARCHAR(655)  AFTER `Business Finder Name`")
mycursor1.execute("UPDATE `input3` SET `Home Phone`=IF(`tel_direct`<>`telephone` ,CONCAT('+',`telephone`),NULL)")
mycursor1.execute("ALTER TABLE `input3` ADD `Secondary Email` VARCHAR(655)  AFTER `Home Phone`")
mycursor1.execute("UPDATE `input3` SET `Secondary Email`=`mail_general`")
mycursor1.execute("ALTER TABLE `input3` ADD `TelDerect` text  AFTER `Secondary Email`")
mycursor1.execute("ALTER TABLE `input3` ADD `Mandataire` text  AFTER `TelDerect`")
mycursor1.execute("UPDATE `input3` SET `TelDerect`=IF(`telephone` IS NOT NULL ,CONCAT('+',`telephone`),`telephone`)")
mycursor1.execute("ALTER TABLE `input3` ADD `Description` text  AFTER `Mandataire`")
mycursor1.execute("ALTER TABLE `input3` change column `prenom`  `Account Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` change column `prenom2`   `First Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` change column `nom2`   `Last Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` change column statut   `Lead Status` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` change column telephone  `Telephone` VARCHAR(255)")
mycursor1.execute("UPDATE `input3` SET `Account Name`= REPLACE(`Account Name`, '?', 'e')")
mycursor1.execute("ALTER TABLE `input3` change column `numero_entreprise`  `Account Number` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` change column agent   `AGdata` VARCHAR(255)")
mycursor1.execute("UPDATE `input3` SET `Last Name`= REPLACE(`Last Name`, '?', 'e')")
mycursor1.execute("UPDATE `input3` SET `First Name`= REPLACE(`First Name`, '?', 'e')")
mycursor1.execute("UPDATE `input3` set Description=CONCAT_WS('\n', CONCAT( `Account Name`,' ','(', `Billing Code`,' ',`Billing City`,')'), CONCAT(`nace_description`),CONCAT('Tel: ',TelDerect),CONCAT('\n','prospection tel, agent ',AGdata,':'),CONCAT(`Lead Status`),CONCAT(`First Name`,' ',`Last Name`,' ',`sexe`),CONCAT('\n',`commentaire_appel`),CONCAT('\n',`date_appel`))")
mycursor1.execute("ALTER TABLE `input3` change column `mail_direct`   `Email` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3` ADD `Billing Province (BE)` text  AFTER `Mandataire`")
mycursor1.execute("UPDATE `input3` SET `Billing Province (BE)`=`province`")
mycursor1.execute("ALTER TABLE `input3` ADD  `Prospect Source` text  AFTER `Mandataire`")
mycursor1.execute("UPDATE `input3` SET `Prospect Source`='Prospection phone call'")
mycursor1.execute("ALTER TABLE `input3` ADD  `Mail du commentaire` text  AFTER `Mandataire`")

mycursor1.execute("UPDATE `input3` SET `Mail du commentaire`=IF(`commentaire_appel` LIKE '%@%',`commentaire_appel`,NULL)")
#mycursor1.execute("CREATE TABLE  rod_output.Import_Zoho_all AS SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
#mycursor1.execute("CREATE TABLE rod_output.Import_Zoho_contact AS SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
#mycursor1.execute("CREATE TABLE   rod_output.Import_Zoho_compte AS SELECT `Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner` FROM `input3` GROUP BY `Phone (Account)` ")

mycursor1.execute("INSERT INTO rod_output.Import_Zoho_all(`Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description`)  SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
mycursor1.execute("INSERT INTO rod_output.Import_Zoho_contact(`Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description`) SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
mycursor1.execute("INSERT INTO  rod_output.Import_Zoho_compte(`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner`) SELECT `Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner` FROM `input3` GROUP BY `Phone (Account)` ")
mycursor1.execute("TRUNCATE TABLE data_input")
mydb.commit()

print('script ok')
