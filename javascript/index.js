function WriteToFile(passForm) {
  var fso = new ActiveXObject("Scripting.FileSystemObject");

  var fileLoc = "data.csv";

  var file = fso.CreateTextFile(fileLoc, true);

  file.writeline(passForm.FirstName.value + "," + passForm.LastName.value);

  file.Close();

  alert("File created successfully at location: " + fileLoc);
}
