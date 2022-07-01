import React, { useState, useEffect } from "react";
import axios from "axios";

const Search = () => {
	const [datas, setDatas] = useState([]);
	const [searchFilter, setSearchFilter] = useState("");

	useEffect(() => {
		axios
			.get("http://localhost:8000/api/projects")
			.then((res) => {
				setDatas(res.data);
			})
			.catch((err) => console.warn(err));
	}, []);

	const handleSearchFilter = (e) => {
		let value = e.target.value;
		setSearchFilter(value);
	};
	console.log(searchFilter);

	return (
		<div className="Search">
			<div className="search-container">
				<input
					type="text"
					name="searchBar"
					id="searchBar"
					placeholder="SEARCH"
					onChange={handleSearchFilter}
				/>
			</div>
			<div className="search-results">
				{datas
					.filter((val) => {
						return val.name.toLowerCase().includes(searchFilter);
					})
					.map((val) => {
						return (
							<div className="search-result" key={val.id}>
								{val.name}
							</div>
						);
					})}
			</div>
		</div>
	);
};

export default Search;
