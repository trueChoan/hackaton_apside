import React from "react";

import MenuItem from "@mui/material/MenuItem";
import FormControl from "@mui/material/FormControl";
import Select from "@mui/material/Select";

import Box from "@mui/material/Box";
import TextField from "@mui/material/TextField";

const SearchBar = () => {
  const [age, setAge] = React.useState("");

  const handleChange = (event) => {
    setAge(event.target.value);
  };

  return (
    <div className="flex justify-center items-center bg-[#e79759] py-3">
      <FormControl sx={{ minWidth: 150, backgroundColor: 'white' }}>
        <Select
		  placeholder="Locations"
          value={age}
          onChange={handleChange}
          displayEmpty
          inputProps={{ "aria-label": "Without label" }}
        >
          <MenuItem value="Locations"></MenuItem>
          <MenuItem value={10}>Paris</MenuItem>
          <MenuItem value={20}>Lyon</MenuItem>
          <MenuItem value={30}>Marseille</MenuItem>
        </Select>
      </FormControl>
	  
	  <Box
      component="form"
      sx={{ m: 1, width: 500, backgroundColor: 'white' }}
      noValidate
      autoComplete="off"
    >
      <TextField id="filled-basic" label="Write here to search a mission" variant="filled"
	  sx={{ width: 500, backgroundColor: 'white', height: '100%' }} />
    </Box>

    </div>
  );
};

export default SearchBar;
