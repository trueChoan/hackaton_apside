import React from "react";
import ReactDOM from "react-dom/client";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import App from "./pages/App";

function Main() {
	return (
		<Router>
			<Routes>
				<Route exact path="/" element={<App />} />
			</Routes>
		</Router>
	);
}

export default Main;

if (document.getElementById("app")) {
	const root = ReactDOM.createRoot(document.getElementById("app"));
	root.render(
		<React.StrictMode>
			<Main />
		</React.StrictMode>
	);
}
