import { useState, useEffect } from "react";

export function useFetch(baseUrl) {
  const [isLoading, setIsLoading] = useState(true);
  const [fdata, setFdata] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    const abortController = new AbortController();
    setIsLoading(true);
    fetch(baseUrl, { signal: abortController.signal })
      .then((response) => response.json())
      .then((data) => {
        setFdata(data);
      })
      .catch((error) => setError(error))
      .finally(() => setIsLoading(false));

    return () => abortController.abort(); //se ejecuta cuando el componente se ha desmontado (cuando no esta mas en pantalla)
  }, []);

  return { fdata, isLoading, error };
}

export function useFetchById(baseUrl, id) {
  const [isLoading, setIsLoading] = useState(true);
  const [data, setData] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    const abortController = new AbortController();
    setIsLoading(true);
    if (id) {
      fetch(baseUrl + `?id=${id}`, { signal: abortController.signal })
        .then((response) => response.json())
        .then((data) => {
          setData(data);
        })
        .catch((error) => setError(error))
        .finally(() => setIsLoading(false));
    } else {
      setData({});
    }
    return () => abortController.abort(); //se ejecuta cuando el componente se ha desmontado (cuando no esta mas en pantalla)
  }, [id]);

  return { data, isLoading, error };
}
