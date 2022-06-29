import React from "react";

import Header from "../components/Header";
import SearchBar from "../components/Searchbar";
import NavSelector from "../components/NavSelector";
import TableCards from "../components/TableCards";

const App = () => {
	return (
		<div className="page-container">
			<Header />

			<SearchBar />

			<main id="mainpage">
				<NavSelector />

				<TableCards />
			</main>
		</div>
	);
};

export default App;
