import pandas as pd

df = pd.read_excel (r'C:\xampp\htdocs\nosnihcsdosCorp\serverSide\data_input.xlsx') #place "r" before the path string to address special character, such as '\'. Don't forget to put the file name at the end of the path + '.xlsx'
print (df)