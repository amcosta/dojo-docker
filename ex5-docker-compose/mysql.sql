CREATE TABLE cep (
  id INTEGER AUTO_INCREMENT NOT NULL PRIMARY KEY,
  cep VARCHAR(15) NOT NULL,
  logradouro VARCHAR(255) NOT NULL,
  complemento VARCHAR(255),
  bairro VARCHAR(255) NOT NULL,
  uf VARCHAR(2) NOT NULL
);