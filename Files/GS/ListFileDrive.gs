function myFunction() {
  Logger.log('start listing file');
  var files = DriveApp.getFiles();
while (files.hasNext()) {
  var file = files.next();
  Logger.log(file);
}
}
myFunction();