import React, { useState, useEffect } from "react";
import axios from "axios";

import Card from "../components/Card";
import OrderBy from "../components/OrderBy";
import ButtonPage from "../components/ButtonPage";
import SearchResult from "../components/SearchResult";

import Header from "../components/Header";
import NavSelector from "../components/NavSelector";
// import SearchBar from "../components/Searchbar";
// import TableCards from "../components/TableCards";

const App = () => {
	const [projects, setProjects] = useState([]);
	const [searchFilter, setSearchFilter] = useState("");

	useEffect(() => {
		axios
			.get("http://localhost:8000/api/projects")
			.then((res) => setProjects(res.data))
			.catch((err) => console.warn(err));
	}, []);

	const handleSearchFilter = (e) => {
		let value = e.target.value;
		setSearchFilter(value);
	};

	return (
		<div className="page-container">
			<Header />

			<div id="SEARCH">
				<input
					type="text"
					name="searchBar"
					id="searchBar"
					placeholder="Search Project Name"
					onChange={handleSearchFilter}
				/>
			</div>

			<div id="NAVSIDE">
				<NavSelector />
			</div>

			<div id="MAIN">
				<div id="NAVMAIN">
					<OrderBy />
					<SearchResult />
					<ButtonPage />
				</div>

				<div id="TABLE">
					{projects
						.filter((el) => {
							return el.name.toLowerCase().includes(searchFilter);
						})
						.map((el) => (
							<Card
								id={el.id}
								name={el.name}
								resume={el.description}
								location={el.agency[0].name}
								userFName={el.user[0].firstname}
								userLName={el.user[0].lastname}
								collab={Math.floor(10 + Math.random() * (50 - 1))}
								stack={el.techStack.techno}
								bgColor={el.domain.color}
								domain={el.domain.name}
								// flag={el.user[0].flag}
								// progress={el.progress}
								// creationDate={el.created_at.slice(0, 10)}
							/>
						))}
				</div>
			</div>
		</div>
	);
};

export default App;
