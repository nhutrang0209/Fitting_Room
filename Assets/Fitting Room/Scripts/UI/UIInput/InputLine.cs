using System;
using TMPro;
using UnityEngine;
using UnityEngine.UI;

namespace Fitting_Room
{
    public class InputLine : MonoBehaviour
    {
        [SerializeField] private string fieldName;
        
        [SerializeField] private TMP_InputField inputField;
        [SerializeField] private Slider slider;

        [Header("Values")]
        [SerializeField] private float minValue;
        [SerializeField] private float maxValue;
        [SerializeField] private float defaultValue;
        
        private void Start()
        {
            inputField.text = defaultValue.ToString("F1");
            slider.value = GetSliderValue(defaultValue);
            
            inputField.onValueChanged.AddListener(OnInputFieldValueChange);
            slider.onValueChanged.AddListener(OnSliderValueChange);
        }

        private float GetSliderValue(float currentValue)
        {
            var range = maxValue - minValue;
            var cnt = currentValue - minValue;

            return cnt / range;
        }

        private void OnInputFieldValueChange(string newValue)
        {
            if (float.TryParse(newValue, out var floatValue))
            {
                slider.value = GetSliderValue(floatValue);
                
                if (fieldName == "Height")
                {
                    GameManager.Instance.Player.ChangeHeight(floatValue);
                }
            }
        }

        private void OnSliderValueChange(float newValue)
        {
            inputField.text = GetInputFieldValue(slider.value);
        }

        private string GetInputFieldValue(float sliderValue)
        {
            var range = maxValue - minValue;

            var floatNum = sliderValue * range + minValue;

            return floatNum.ToString("F1");
        }
    }
}