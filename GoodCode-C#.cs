 
 
 // #TextBox : {محدود کردن به حروف عددی},{limitToNumericLetters}

 private void NumericTextBox_KeyPress(object sender, KeyPressEventArgs e)
 {
     // Check if the pressed key is a digit, Backspace, or Delete
     if (!char.IsDigit(e.KeyChar) && e.KeyChar != '\b' && e.KeyChar != (char)Keys.Delete)
     {
         e.Handled = true; // Ignore the key press
     }
 }

// #TextBox : {جدا کردن 3 رقم 3 رقم },{Separate 3 digits 3 digits}

   private void FormatSelectText(TextBox textBox)
  {
      if (string.IsNullOrEmpty(textBox.Text) || textBox.Text == "0")
          return;

      long value;
      if (long.TryParse(textBox.Text.Replace(",", ""), out value))
      {
          textBox.Text = value.ToString("#,0");
          textBox.Select(textBox.TextLength, 0);
      }
  }


// #Label : {جدا کردن 3 رقم 3 رقم},{Separate 3 digits 3 digits}
  private void FormatLabelText(Label label)
  {
      if (string.IsNullOrEmpty(label.Text) || label.Text == "0")
          return;

      long value;
      if (long.TryParse(label.Text.Replace(",", ""), out value))
      {
          label.Text = value.ToString("#,0");
      }
  }