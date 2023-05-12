const validation = new JustValidate("#signup");

validation
  .addField("#fullName", [
    {
      rule: "required",
    },
  ])
  .addField("#email", [
    {
      rule: "required",
    },
    {
      rule: "email",
    },
  ])
  .addField("#password", [
    {
      rule: "required",
    },
    {
      rule: "password",
    },
  ])
  .addField("#confirm", [
    {
      validator: (value, fields) => {
        return value === fields["#password"].elem.value;
      },
      errorMessage: "Passwords do not match",
    },
  ])
  .addField("#about", [
    {
      rule: "required",
    },
  ])
  .onSuccess((event) => {
    document.getElementById("signup").submit();
  });
