import React from "react";

const NavSelector = () => {
	return (
		<nav id="NavSelector">
			<section>
				<h1>
					<div>Our</div>
					<div>AGENCIES</div>
				</h1>
				<p>
					<span>Nantes</span>
					<span className="colored">30</span>
				</p>
				<p>
					<span>Paris</span>
					<span className="colored">100</span>
				</p>
				<p>
					<span>Lisbon</span>
					<span className="colored">50</span>
				</p>
				<p>
					<span>Marseille</span>
					<span className="colored">25</span>
				</p>
				<p>
					<span>Bordeaux</span>
					<span className="colored">25</span>
				</p>
				<p>
					<span>Rennes</span>
					<span className="colored">45</span>
				</p>
				<p>
					<span>Canada</span>
					<span className="colored">50</span>
				</p>
				<p>
					<span>Vernon</span>
					<span className="colored">30</span>
				</p>
			</section>

			<section>
				<h1>
					<div>Our</div> MISSIONS
				</h1>
				<p>
					<span>Developper</span>
					<span className="colored">420</span>
				</p>
				<p>
					<span>Data Analyst</span>
					<span className="colored">125</span>
				</p>
				<p>
					<span>Cyber Security</span>
					<span className="colored">190</span>
				</p>
				<p>
					<span>Aeronotic</span>
					<span className="colored">190</span>
				</p>
			</section>
		</nav>
	);
};

export default NavSelector;
