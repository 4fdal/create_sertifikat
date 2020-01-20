import requests

host = "http://localhost/create_sertifikat/index.php"

def struktur() :
    data = """AFDAL:KOORDINATOR PUBLIKASI DAN DOKUMENTASI,SELVILA YOLANDA:STAFF KOORDINATOR PUBLIKASI DAN DOKUMENTASI,RIFA ZURMAERA:STAFF KOORDINATOR PUBLIKASI DAN DOKUMENTASI,VIVI RAHMAWATI:SEKRETARIS 1,HAFIZA AULIA:SEKRETARIS UMUM,ERMAN:KOORDINATOR PERLENGKAPAN,RIRI SILVANI DWI PUTRI: BENDAHARA 1,YOVI REZKI PUTRA: KETUA UMUM JAWARA PNP,ILHAM PRASETIYA:WAKIL KETUA UMUM JAWARA PNP,MUHAMAD AZRI : STAFF KOORDINATOR PSDM,RIZKA HIDAYAT : BENDAHARA UMUM,ANWADI LAMARCHTA : KOORDINATOR HUMAS,ZIKRI : STAFF KOORDINATOR HUMAS, MILIO ONER:KOORDINATOR PSDM,M. IKHSAN MUZZAKI:KETUA CABOR KARATE"""
    data = data.split(",")
    for value in data :
        value = value.split(":")
        (nama, jabatan) = value 
        send = requests.post(host, data={'nama':nama, 'jabatan':jabatan})
        print(send.text)

def anggota():
    data = """Afdhallurijal, Ahmad Affandi, Akmal Majid, Anggit Demariza, Anwadi Lamarchta, Arif Irsyad, Dessy Kashariyanti, Elsy Krisdayanti, Erman, Eqrio Gravinda Mafi, Fadly Indri Jasaputra, Hafiza Aulia, Harun Lubis, Jimmy Ramadan, M.Isthofa Ardhana, M.Syukri, Michelle Novri C.P, Milio Oner, Musa Korneles S., Nilam,Azizah, Nurul Annisa, Nurul Utami Husna, Rahmat Putra Zeep, Rahmianti, Raju Nofrial, Rangga Syaputra, Rizka Hidayat, Sukma Yulhamdani, Yovi Rezki Putra, Yulistiawati"""
    data = data.split(',')
    for value in data :
        send = requests.post(host, data={'nama': value, 'jabatan': 'ANGGOTA UKM JAWARA'})
        print(send.text)

anggota()
struktur()
