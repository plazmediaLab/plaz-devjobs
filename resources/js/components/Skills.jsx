import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import IconPulse from './icon-pulse';

const Skills = () => {

  const [skills, setSkills] = useState([]);
  const [fetching, setFetching] = useState(false);

  const data = async () => {
    setFetching(true);
    try {
      const req = await fetch('http://localhost:8000/skills');
      const res = await req.json();

      // setSkills(res.sort(function (a, b) {
      //   if (a.name > b.name) {
      //     return 1;
      //   }
      //   if (a.name < b.name) {
      //     return -1;
      //   }
      //   // a must be equal to b
      //   return 0;
      // }));
      setSkills(res);

      setFetching(false);

    } catch (error) {
      console.log(error);
      setFetching(false);
    }
  }

  useEffect(() => {
    data();
  }, []);

  return (
    <React.Fragment>
      { fetching ? (
        <div className="flex items-center justify-center flex-col">
          <IconPulse/>
          <p className="text-xs text-gray-500 block mt-2">Cargando...</p>
        </div>
      ) : (
        <ul className="flex items-center justify-center flex-wrap space-x-1 space-y-1 font-medium text-gray-600 text-xs">
          {skills.map(item => (
            <li key={item.id} className="py-1 px-3 rounded-full bg-gray-300">
              { item.name }
            </li>
          ))}
        </ul>
      ) }
    </React.Fragment>
  );
};

export default Skills;

if (document.getElementById('example')) {
  ReactDOM.render(<Skills />, document.getElementById('example'));
}
