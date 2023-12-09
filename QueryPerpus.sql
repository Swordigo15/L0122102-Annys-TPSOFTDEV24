CREATE DATABASE PERPUSTAKAAN

-- CREATE
CREATE TABLE PENULIS(
	IdPenulis		nvarchar(20) PRIMARY KEY,
	NamaDepan		nvarchar(10),
	NamaBelakang	nvarchar(10),
	Sex				nvarchar(10),
	Umur			int
);

CREATE TABLE BUKU(
	ISBN			nvarchar(13) PRIMARY KEY,
	Judul			nvarchar(50),
	Penerbit		nvarchar(30),
	JumlahHalaman	int,
	ThnTerbit		int,
	IdPenulis		nvarchar(20) FOREIGN KEY REFERENCES PENULIS (IdPenulis)
);

CREATE TABLE Kategori(
	ISBNBuku		nvarchar(13) FOREIGN KEY REFERENCES BUKU (ISBN),
	NamaKategori	nvarchar(20),
	PRIMARY KEY (ISBNBuku, NamaKategori)
);

-- INSERT
INSERT INTO PENULIS Values ('001','Andrea','Hirata','Laki-Laki', 56);
INSERT INTO PENULIS Values ('002','Tere','Liye','Laki-Laki', 44);
INSERT INTO PENULIS Values ('003', 'Raditya','Dika','Lak-Laki', 38);

INSERT INTO BUKU Values ('9786022916628', 'Laskar Pelangi', 'Bentang Pustaka', 529, 2020, '001');
INSERT INTO BUKU Values ('9786239554569', 'Tentang Kamu', 'PENERBIT SABAK GRIP', 503, 2021, '002');
INSERT INTO BUKU Values ('9789797808990', 'Koala Kumal', 'GagasMedia', 180, 2017, '003');

INSERT INTO KATEGORI Values ('9786022916628', 'NonFiksi');
INSERT INTO KATEGORI Values ('9786022916628', 'Novel'); 

INSERT INTO KATEGORI Values ('9786239554569', 'Novel'); 
INSERT INTO KATEGORI Values ('9786239554569', 'Fiksi');

INSERT INTO KATEGORI Values ('9789797808990', 'Humor');
INSERT INTO KATEGORI Values ('9789797808990', 'Fiksi');
INSERT INTO KATEGORI Values ('9789797808990', 'Novel'); 

-- READ
SELECT * FROM BUKU
SELECT * FROM PENULIS
SELECT * FROM Kategori

-- DELETE
DROP TABLE Kategori
DROP TABLE BUKU
DROP TABLE PENULIS
