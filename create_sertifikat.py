import requests

host = "http://localhost/create_sertifikat/index.php"

def struktur() :
    data = """Afdal:Koordinator Publikasi Dan Dokumentasi,Selvila Yolanda:Staff Koordinator Publikasi Dan Dokumentasi,Rifa Zurmaera:Staff Koordinator Publikasi Dan Dokumentasi,Vivi Rahmawati:Sekretaris 1,Hafiza Aulia:Sekretaris Umum,Erman:Koordinator Perlengkapan,Riri Silvani Dwi Putri: Bendahara 1,Yovi Rezki Putra: Ketua Umum Jawara Pnp,Ilham Prasetiya:Wakil Ketua Umum Jawara Pnp,Muhamad Azri : Staff Koordinator Psdm,Rizka Hidayat : Bendahara Umum,Anwadi Lamarchta : Koordinator Humas,Zikri : Staff Koordinator Humas, Milio Oner:Koordinator Psdm,M. Ikhsan Muzzaki:Ketua Cabor Karate"""
    data = data.split(",")
    for value in data :
        value = value.split(":")
        (nama, jabatan) = value 
        send = requests.post(host, data={'nama':nama, 'jabatan':jabatan, 'dir':'Struktur'})
        print(send.text)

def anggota():
    data = """Afdhallurijal,Ahmad Affandi,Akmal Majid,Anggit Demariza,Anwadi Lamarchta,Arif Irsyad, Dessy Kashariyanti,Elsy Krisdayanti,Erman,Eqrio Gravinda Mafi,Fadly Indri Jasaputra,Hafiza Aulia,Harun Lubis, Jimmy Ramadan,M.Isthofa Ardhana,M.Syukri,Michelle Novri C.P,Milio Oner, Musa Korneles S.,Nilam,Azizah, Nurul Annisa,Nurul Utami Husna,Rahmat Putra Zeep,Rahmianti,Raju Nofrial,Rangga Syaputra,Rizka Hidayat, Sukma Yulhamdani,Yovi Rezki Putra,Yulistiawati"""
    data = data.split(',')
    for value in data :
        send = requests.post(
            host, data={'nama': value, 'jabatan': 'Anggota Ukm Jawara', 'dir': 'Anggota'})
        print(send.text)

anggota()
struktur()
