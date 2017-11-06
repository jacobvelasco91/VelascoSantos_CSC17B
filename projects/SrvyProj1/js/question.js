function Questions (ques,name,answers) {
  if (arguments.length == 3) {
    this.ques = ques;
    this.name = name;
    this.answers = answers;
  } else if (arguments.length == 2) {
    this.ques = ques;
    this.name = name;
    this.answers = "";

  } else if (arguments.length == 1) {
    this.ques = ques;
    this.name = "";
    this.answers = "";
  } else {
    this.ques = "";
    this.name = "";
    this.answers = [];
  }
}
