import React from "react";
import Box from "@mui/material/Box";
import TextField from "@mui/material/TextField";

const SearchBar = () => {
  const [age, setAge] = React.useState("");

  const handleChange = (event) => {
    setAge(event.target.value);
  };

  return (
    <div className="flex justify-center items-center bg-[#e79759] py-3">

      <Box
        component="form"
        sx={{ m: 1, width: 500, color: 'white' }}
        noValidate
        autoComplete="off"
      >
        <TextField id="filled-basic" label="Write here to search a mission" variant="filled"
          sx={{ width: 500, background: 'white', height: '100%', borderRadius: '3px' }}  />
      </Box>

    </div>
  );
};

export default SearchBar;
