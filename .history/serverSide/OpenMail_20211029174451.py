from win32com.client import Dispatch

xl = Dispatch("Excel.Application")
xl.Visible = True # otherwise excel is hidden

# newest excel does not accept forward slash in path
wb = xl.Workbooks.Open(r'C:\xampp\htdocs\nosnihcsdosCorp\serverSide\data_input.xlsx')
wb.Close()
xl.Quit()