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
mycursor2.execute("TRUNCATE TABLE Import_Zoho_all_test")
mycursor2.execute("TRUNCATE TABLE Import_Zoho_contact_test ")
mycursor2.execute("TRUNCATE TABLE Import_Zoho_compte_test ")
mycursor1.execute("DROP TABLE IF EXISTS input1_test ")
mycursor1.execute("DROP TABLE IF EXISTS input2_test ")
mycursor1.execute("DROP TABLE IF EXISTS input3_test ")
mycursor1.execute("CREATE TABLE input1_test  AS SELECT * FROM data_input_test  LEFT JOIN `code_postaux_test ` ON `data_input_test `.`code_postal`= `code_postaux _test `.`CODE POSTAL2` WHERE 1")
mycursor1.execute("UPDATE `input1_test ` SET `sexe`=IF(`sexe`<>'NULL',`sexe`,'M')")
mycursor1.execute("UPDATE `input1_test ` SET `sexe`=IF(`sexe`='','M',`sexe`)")
mycursor1.execute("UPDATE `input1_test ` SET `sexe`=IF(`sexe` IS NULL,'M',`sexe`)")
mycursor1.execute("ALTER TABLE `input1_test ` change column adresse  `Billing Street` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1_test ` change column `code_postal`  `Billing Code` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1_test ` change column PAYS  `Pays` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1_test ` change column COMMUNE  `Billing City` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input1_test ` change column REGION  `Région` VARCHAR(255)")
mycursor1.execute("UPDATE `input1_test ` SET `Billing City`= REPLACE(`Billing City`, '-', ' - ')")
mycursor1.execute("UPDATE `input1_test ` SET `Billing City`= REPLACE(`Billing City`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1_test ` SET `Billing City`= REPLACE(`Billing City`, '?', 'e')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '-', ' ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', ' _ ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '_', '  ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, 'x000D', ' ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, 'x000d', ' ')")
mycursor1.execute("UPDATE `input1_test ` SET `commentaire_appel`= REPLACE(`commentaire_appel`, '?', 'e')")

mycursor1.execute("UPDATE `input1_test ` SET `Billing Street`= REPLACE(`Billing Street`, '?', 'e')")
mycursor1.execute("UPDATE `input1_test ` SET `nace_description`= REPLACE(`nace_description`, '-', ' ')")
mycursor1.execute("UPDATE `input1_test ` SET `nace_description`= REPLACE(`nace_description`, '?', 'e')")
mycursor1.execute("ALTER TABLE `input1_test ` ADD Salutation VARCHAR(255)  AFTER nom")
mycursor1.execute("ALTER TABLE `input1_test ` ADD `Salutation Emails`  VARCHAR(255)  AFTER Salutation")
#mycursor1.execute("UPDATE `input1` SET sexe=IF(sexe="" or sexe IS NULL,'M',sexe)")
mycursor1.execute("CREATE TABLE input2_test AS SELECT * FROM `input1_test` LEFT JOIN `languageagent_test` ON `input1_test`.`agent`= `languageagent_test`.`NomAgent`  WHERE 1")
#mycursor1.execute("UPDATE `input2` SET `Prefered Language`= Preferred Language'")
mycursor1.execute("ALTER TABLE `input2_test ` change column ` Prefered Language`  `Preferred Language` VARCHAR(255)")
mycursor1.execute("UPDATE `input2_test ` SET `Preferred Language`= REPLACE(`Preferred Language`, ' ', '')")
mycursor1.execute("UPDATE `input2_test ` SET Salutation=IF(`sexe`='M' && `Preferred Language`='NL','heer',IF(`sexe`='F' && `Preferred Language`='NL','mevrouw',IF(`sexe`='M' && `Preferred Language`='FR','Monsieur',IF(`sexe`='F' && `Preferred Language`='FR','Madame',Salutation))))")
mycursor1.execute("UPDATE `input2_test ` SET `Salutation Emails`=IF(`sexe`='M' && `Preferred Language`='NL','Geachte',IF(`sexe`='F' && `Preferred Language`='NL','Geachte',IF(`sexe`='M' && `Preferred Language`='FR','Cher',IF(`sexe`='F' && `Preferred Language`='FR','Chère',`Salutation Emails`))))")
mycursor1.execute("CREATE TABLE `input3_test ` AS SELECT * FROM `input2` WHERE statut='OPPORTUNITES' or statut='ACHETEUR' or statut='ACHETEUR / VENDEUR' OR statut='VENDEUR' OR statut='VENDEUR FUTUR' OR statut='RDV'")
mycursor1.execute("ALTER TABLE `input3_test ` ADD Acheteur VARCHAR(255)  AFTER statut")
mycursor1.execute("ALTER TABLE `input3` ADD Vendeur VARCHAR(255)  AFTER Acheteur")
mycursor1.execute("UPDATE `input3_test ` SET Acheteur=IF(statut='ACHETEUR' or statut='ACHETEUR / VENDEUR','True','False')")
mycursor1.execute("UPDATE `input3_test ` SET Vendeur=IF(statut='VENDEUR' or statut='VENDEUR FUTUR'  or statut='ACHETEUR / VENDEUR' ,'True','False')")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Origine du Prospect` VARCHAR(255)  AFTER Vendeur")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Other Street` VARCHAR(255)  AFTER `Origine du Prospect`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Other Zip` VARCHAR(255)  AFTER `Other Street` ")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Other City` VARCHAR(255)  AFTER `Other Zip`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Converting Agent` VARCHAR(255)  AFTER `Other City`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Phone (Account)` VARCHAR(255)  AFTER `Converting Agent`")
mycursor1.execute("UPDATE `input3_test ` SET `Origine du Prospect`='Prospection phone call'")
mycursor1.execute("UPDATE `input3_test ` SET `tel_direct`=IF(LEFT(`tel_direct`,2)='32' or LEFT(`tel_direct`,1)='+' or `tel_direct` IS NULL,`tel_direct`,CONCAT('32',`tel_direct`))")
mycursor1.execute("UPDATE `input3_test ` SET telephone=IF(LEFT(`telephone`,2)='32' or LEFT(`telephone`,1)='+' or  `telephone` IS NULL,`telephone`,CONCAT('32',`telephone`))")
#mycursor1.execute("UPDATE `input3` SET `gsm`=IF(LEFT(`gsm`,2)<>'32' or LEFT(`gsm`,1)<>'+' and `gsm` IS NOT NULL,CONCAT('32',`gsm`),`gsm`)")
mycursor1.execute("UPDATE `input3_test ` SET `gsm`=IF(LEFT(`gsm`,2)='32' or LEFT(`gsm`,1)='+' or `gsm` IS NULL,`gsm`,CONCAT('32',`gsm`))")

mycursor1.execute("UPDATE `input3_test ` SET `gsm`=IF(LENGTH(`gsm`)<4,NULL,`gsm`)")
mycursor1.execute("UPDATE `input3_test ` SET `tel_direct`=IF(LENGTH(`tel_direct`)<4,NULL,`tel_direct`)")
#mycursor1.execute("UPDATE `input3` SET `Phone (Account)`=Phone ")
mycursor1.execute("ALTER TABLE `input_test ` ADD `Mobile` VARCHAR(255)  AFTER `Phone (Account)`")
mycursor1.execute("ALTER TABLE `input_test ` ADD `Phone` VARCHAR(255)  AFTER `Mobile`")
mycursor1.execute("UPDATE `input3_test ` SET `Mobile`=IF(`gsm` IS NOT NULL and LEFT(`gsm`,1)<>'+',CONCAT('+',`gsm`),`gsm`)")
mycursor1.execute("UPDATE `input3_test ` SET `Phone`=IF(LEFT(`tel_direct`,2)='32' And `tel_direct` IS NOT NULL,CONCAT('+',`tel_direct`) ,IF(LEFT(telephone,2)='32',CONCAT('+',telephone),telephone))")
mycursor1.execute("UPDATE `input3_test ` SET `Other Street`=`Billing Street`")
mycursor1.execute("UPDATE `input3_test ` SET `Phone (Account)`=Phone ")
mycursor1.execute("UPDATE `input3_test ` SET `Other Zip`=`Billing Code`")
mycursor1.execute("UPDATE `input3_test ` SET `Other City`=`Billing City`")
mycursor1.execute("UPDATE `input3_test ` SET `Converting agent`=IF(Vendeur='True',agent,NULL)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Province (BE)` VARCHAR(255)  AFTER `Phone (Account)`")
mycursor1.execute("UPDATE `input3_test ` SET `Province (BE)`=`province`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Vendor Assessment Notes` VARCHAR(655)  AFTER `Phone (Account)`")
mycursor1.execute("UPDATE `input3_test ` SET `Vendor Assessment Notes`=IF(Vendeur='True',`commentaire_appel`,NULL)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `New Import` VARCHAR(655)  AFTER `Vendor Assessment Notes`")
mycursor1.execute("UPDATE `input3_test ` SET `New Import`='400'")
mycursor1.execute("UPDATE `input3_test ` SET `Other Street`=IF(statut='RDV' or statut='VENDEUR',`Billing Street`,NULL)")
mycursor1.execute("UPDATE `input3_test ` SET `Other Zip`=IF(statut='RDV' or statut='VENDEUR',`Billing Code`,NULL)")
mycursor1.execute("UPDATE `input3_test ` SET `Other City`=IF(statut='RDV' or statut='VENDEUR',`Billing City`,NULL)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Source list name` VARCHAR(655)  AFTER `New Import`")
mycursor1.execute("UPDATE `input3_test ` SET `Source list name`=CONCAT(`liste_appel`,' ',`date_appel`)")
mycursor1.execute("UPDATE `input3_test ` SET `Preferred Language`=IF(`Preferred Language`='FR','French',IF(`Preferred Language`='NL','Dutch',`Preferred Language`))")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Contact Owner` VARCHAR(655)  AFTER `Source list name`")
mycursor1.execute("UPDATE `input3_test ` SET `Contact Owner`=IF(statut='ACHETEUR' or statut='OPPORTUNITES' AND `Preferred Language`='Dutch','h.malchasian@rodschinson.com',IF(statut='VENDEUR' or statut='ACHETEUR / VENDEUR' or statut='VENDEUR FUTUR' and `Preferred Language`='Dutch','wim.hoste@rodschinson.com',IF(statut='ACHETEUR' or statut='OPPORTUNITES' and  `Preferred Language`='French','m.bariaz@rodschinson.com',IF(statut='VENDEUR' or statut='ACHETEUR / VENDEUR' or statut='VENDEUR FUTUR' and `Preferred Language`='French','m.bariaz@rodschinson.com',NULL))))")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Business Finder Name` VARCHAR(655)  AFTER `Contact Owner`")
mycursor1.execute("UPDATE `input3_test ` SET `Business Finder Name`=Agent")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Home Phone` VARCHAR(655)  AFTER `Business Finder Name`")
mycursor1.execute("UPDATE `input3_test ` SET `Home Phone`=IF(`tel_direct`<>`telephone` ,CONCAT('+',`telephone`),NULL)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Secondary Email` VARCHAR(655)  AFTER `Home Phone`")
mycursor1.execute("UPDATE `input3_test ` SET `Secondary Email`=`mail_general`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `TelDerect` text  AFTER `Secondary Email`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Mandataire` text  AFTER `TelDerect`")
mycursor1.execute("UPDATE `input3_test ` SET `TelDerect`=IF(`telephone` IS NOT NULL ,CONCAT('+',`telephone`),`telephone`)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Description` text  AFTER `Mandataire`")
mycursor1.execute("ALTER TABLE `input3_test ` change column `prenom`  `Account Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` change column `prenom2`   `First Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` change column `nom2`   `Last Name` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` change column statut   `Lead Status` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` change column telephone  `Telephone` VARCHAR(255)")
mycursor1.execute("UPDATE `input3_test ` SET `Account Name`= REPLACE(`Account Name`, '?', 'e')")
mycursor1.execute("ALTER TABLE `input3_test ` change column `numero_entreprise`  `Account Number` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` change column agent   `AGdata` VARCHAR(255)")
mycursor1.execute("UPDATE `input3_test ` SET `Last Name`= REPLACE(`Last Name`, '?', 'e')")
mycursor1.execute("UPDATE `input3_test ` SET `First Name`= REPLACE(`First Name`, '?', 'e')")
mycursor1.execute("UPDATE `input3_test ` set Description=CONCAT_WS('\n', CONCAT( `Account Name`,' ','(', `Billing Code`,' ',`Billing City`,')'), CONCAT(`nace_description`),CONCAT('Tel: ',TelDerect),CONCAT('\n','prospection tel, agent ',AGdata,':'),CONCAT(`Lead Status`),CONCAT(`First Name`,' ',`Last Name`,' ',`sexe`),CONCAT('\n',`commentaire_appel`),CONCAT('\n',`date_appel`))")
mycursor1.execute("ALTER TABLE `input3_test ` change column `mail_direct`   `Email` VARCHAR(255)")
mycursor1.execute("ALTER TABLE `input3_test ` ADD `Billing Province (BE)` text  AFTER `Mandataire`")
mycursor1.execute("UPDATE `input3_test ` SET `Billing Province (BE)`=`province`")
mycursor1.execute("ALTER TABLE `input3_test ` ADD  `Prospect Source` text  AFTER `Mandataire`")
mycursor1.execute("UPDATE `input3_test ` SET `Prospect Source`='Prospection phone call'")
mycursor1.execute("ALTER TABLE `input3_test ` ADD  `Mail du commentaire` text  AFTER `Mandataire`")

mycursor1.execute("UPDATE `input3_test` SET `Mail du commentaire`=IF(`commentaire_appel` LIKE '%@%',`commentaire_appel`,NULL)")
#mycursor1.execute("CREATE TABLE  rod_output.Import_Zoho_all AS SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
#mycursor1.execute("CREATE TABLE rod_output.Import_Zoho_contact AS SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3` GROUP BY `Telephone`")
#mycursor1.execute("CREATE TABLE   rod_output.Import_Zoho_compte AS SELECT `Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner` FROM `input3` GROUP BY `Phone (Account)` ")

mycursor1.execute("INSERT INTO rod_output.Import_Zoho_all_test (`Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description`)  SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3_test` GROUP BY `Telephone`")
mycursor1.execute("INSERT INTO rod_output.Import_Zoho_contact_test (`Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description`) SELECT `Salutation` , `Salutation Emails`,`First Name`,`Last Name`,`Preferred Language`,`Mobile`,`Phone`,`Email`,`Other Street`,`Other Zip`,`Other City`,`Province (BE)`,`Account Name`,`Lead status`,`Acheteur`,`Vendeur`,`Prospect Source`,`Converting Agent`,`Source list name`,`Vendor Assessment Notes`,`New Import`,`Contact Owner`,`Business Finder Name`,`Home Phone`,`Secondary Email`,`Telephone`,`Mandataire`,`Mail du commentaire`,`Description` FROM `input3_test` GROUP BY `Telephone`")
mycursor1.execute("INSERT INTO  rod_output.Import_Zoho_compte_test (`Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner`) SELECT `Province (BE)`,`Account Name`,`Account Number`,`Billing Street`,`Billing Code`,`Billing City`,`Billing Province (BE)`,`Phone (Account)`,`Contact Owner` FROM `input3_test` GROUP BY `Phone (Account)` ")
mycursor1.execute("TRUNCATE TABLE data_input_test")
mydb.commit()

print('script ok')
