

import os
from pathlib import Path
# opening EXCEL through Code
					#local path in dir
absolutePath = Path(r'C:\xampp\htdocs\nosnihcsdosCorp\serverSide\data_input.xlsx').resolve()
os.system(f'start excel.exe "{absolutePath}"')

print("Hi");



