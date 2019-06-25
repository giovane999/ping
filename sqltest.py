import requests

url = "http://testphp.vulnweb.com/listproducts.php?cat='"

header = {'user-agent':  'Mozilla/5.0 (Windows NT 10.0; Win64; x64) '
                        'AppleWebKit/537.36 (KHTML, like Gecko) '
                        'Chrome/51.0.2704.103 Safari/537.36'}

req = requests.get(url, headers=header)

html = req.text

if 'mysql_fetch_array()' in html:
    print "Vulneravel"
else:
    print "NÃO Vulneravel"
